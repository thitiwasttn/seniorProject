import smtplib

sender = 'peeghost@hotmail.com'
pwd = '051635297'
reciver = 'twopee26@gmail.com'
message = """\
Subject: your new password
"""

tt = '1444215aac241fq'
body = '''รหัสผ่านใหม่คือ \n'''
body = body + tt
# # body = str(body).encode('utf-8')
message = str(message) +"\n"+ body
message = message.encode('utf-8')

def send(message):
    try:
        server = smtplib.SMTP('smtp-mail.outlook.com', 587)
        server.starttls()
        server.login(sender, pwd)
        server.sendmail(sender, reciver, message)
        server.quit()
        print("successfully sent email")
    except smtplib.SMTPException as ex:
        print(ex)

# print(message)
send(message)