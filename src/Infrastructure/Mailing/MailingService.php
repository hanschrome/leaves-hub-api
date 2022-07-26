<?php

declare(strict_types=1);

namespace Src\Infrastructure\Mailing;

use PHPMailer\PHPMailer\PHPMailer;
use Src\Domain\User\Properties\UserEmail\IUserEmail;

class MailingService implements IMailingService
{
    private MailingConfiguration $mailingConfiguration;

    public function __construct(MailingConfiguration $mailingConfiguration)
    {
        $this->mailingConfiguration = $mailingConfiguration;
    }

    public function getMailingConfiguration(): MailingConfiguration
    {
        return $this->mailingConfiguration;
    }

    public function sendMail(IUserEmail $userEmail, string $subject, string $body): bool
    {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = $this->getMailingConfiguration()->isSmtpDebug();
            $mail->isSMTP();
            $mail->Host = $this->getMailingConfiguration()->getHost();
            $mail->SMTPAuth = $this->getMailingConfiguration()->isSmtpAuth();
            if ($mail->SMTPAuth) {
                $mail->Username = $this->getMailingConfiguration()->getUsername();
                $mail->Password = $this->getMailingConfiguration()->getPassword();
            }
            $mail->SMTPSecure = $this->getMailingConfiguration()->getSmtpSecure();
            $mail->Port = $this->getMailingConfiguration()->getPort();

            $mail->setFrom('user@example.com', 'Mailer'); // @todo
            $mail->addAddress($userEmail->value(), 'User');

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;

            $mail->send();
            $success = true;
        } catch (\Exception $e) {
            $success = false;
        }

        return $success;
    }
}
