import smtpd
import asyncore
from colorama import Fore, Style

class CustomSMTPServer(smtpd.SMTPServer):
    def process_message(self, peer, mailfrom, rcpttos, data, **kwargs):
        mailfrom_str = mailfrom if isinstance(mailfrom, str) else mailfrom.decode('utf-8')
        rcpttos_str = [rcpt if isinstance(rcpt, str) else rcpt.decode('utf-8') for rcpt in rcpttos]
        data_str = data if isinstance(data, str) else data.decode('utf-8')

        print(Fore.GREEN + "Received message:")
        print(Fore.YELLOW + f"From: {mailfrom_str}")
        print(Fore.YELLOW + "To:")
        for recipient in rcpttos_str:
            print(Fore.YELLOW + f"  - {recipient}")
        print(Fore.CYAN + "Message data:")
        print(Fore.RESET + data_str)
        with open("email.html","w") as f:
            f.write(data_str)

# Set the SMTP server host and port
server_host = '127.0.0.1'
server_port = 25

# Create an instance of the custom SMTP server
smtp_server = CustomSMTPServer((server_host, server_port), None)

# Start the SMTP server
print(Fore.MAGENTA + f"Starting SMTP server on {server_host}:{server_port}...")
asyncore.loop()
