<?php
/**
 * Mailer — sends lead notifications.
 *
 * Drivers:
 *  - log  : writes the full message to uploads/logs/mail.log (default, always works)
 *  - mail : PHP mail()
 *  - smtp : PHPMailer (vendor/autoload.php must exist)
 */
declare(strict_types=1);

if (!function_exists('mail_config')) {
    function mail_config(): array
    {
        static $config = null;
        if ($config === null) {
            $config = require ROOT_PATH . '/config/mail.php';
        }
        return $config;
    }
}

if (!function_exists('send_notification')) {
    /**
     * @param array<int, array{file_path:string,original_name:string,mime_type:string,file_size:int}> $attachments
     */
    function send_notification(string $subject, string $htmlBody, array $attachments = []): bool
    {
        $cfg = mail_config();
        $driver = $cfg['driver'] ?? 'log';
        $logDir = uploads_subdir('logs');

        try {
            $sent = false;

            if ($driver === 'smtp' && is_file(ROOT_PATH . '/vendor/autoload.php')) {
                require_once ROOT_PATH . '/vendor/autoload.php';
            }

            if (($driver === 'smtp') && class_exists('PHPMailer\PHPMailer\PHPMailer')) {
                $mail->isSMTP();
                $mail->Host = $cfg['host'];
                $mail->SMTPAuth = $cfg['username'] !== '';
                $mail->Username = $cfg['username'];
                $mail->Password = $cfg['password'];
                $mail->Port = (int) $cfg['port'];
                $mail->SMTPSecure = $cfg['encryption'] === 'tls' ? PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS : '';
                $mail->CharSet = 'UTF-8';
                $mail->setFrom($cfg['from_email'], $cfg['from_name']);
                $mail->addAddress($cfg['to_email']);
                $mail->Subject = $subject;
                $mail->msgHTML($htmlBody);
                foreach ($attachments as $a) {
                    $abs = ROOT_PATH . '/' . $a['file_path'];
                    if (is_file($abs)) $mail->addAttachment($abs, $a['original_name'], 'base64', $a['mime_type']);
                }
                $mail->send();
                $sent = true;
            } elseif ($driver === 'mail') {
                $headers = 'MIME-Version: 1.0' . "\r\n"
                    . 'Content-type: text/html; charset=UTF-8' . "\r\n"
                    . 'From: ' . $cfg['from_name'] . ' <' . $cfg['from_email'] . '>' . "\r\n";
                $sent = @mail($cfg['to_email'], '=?UTF-8?B?' . base64_encode($subject) . '?=', $htmlBody, $headers);
            }

            // Always write the log so nothing is silently lost.
            $log = "To: {$cfg['to_email']}\nSubject: $subject\n$htmlBody\n" . str_repeat('-', 70) . "\n";
            @file_put_contents($logDir . '/mail.log', $log, FILE_APPEND | LOCK_EX);
            return true;
        } catch (Throwable $ex) {
            error_log('[mail] ' . $ex->getMessage());
            return false;
        }
    }
}

if (!function_exists('build_lead_html')) {
    /** Small helper to render a tidy HTML email for a lead. */
    function build_lead_html(string $subject, array $rows, bool $hasFiles = false): string
    {
        $site = site('site_name');
        $rowsHtml = '<table style="border-collapse:collapse;width:100%;max-width:620px;font-family:Arial,sans-serif">';
        $rowsHtml .= '<tr><td style="background:#16231a;padding:16px;color:#fff;font-size:20px;font-weight:bold;">' . e($site) . '</td></tr>';
        $rowsHtml .= '<tr><td style="padding:24px;background:#f7f9f8;">';
        $rowsHtml .= '<h2 style="margin-top:0;color:#16231a;">' . e($subject) . '</h2>';
        foreach ($rows as $label => $value) {
            $safe = $value === '' ? '<em>—</em>' : nl2br(e($value));
            $rowsHtml .= '<p style="margin:8px 0;"><strong style="color:#1e5631;display:inline-block;min-width:150px;">' . e($label) . ':</strong><br>' . $safe . '</p>';
        }
        if ($hasFiles) {
            $rowsHtml .= '<p style="margin:10px 0;color:#1e5631;"><strong>Photos attached &mdash; view them in the admin panel.</strong></p>';
        }
        $rowsHtml .= '</td></tr></table>';
        return $rowsHtml;
    }
}