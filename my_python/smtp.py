import smtplib
import random
import string
import user
import sys


def send(newpassword, receiver):
    sender = 'thi.nuptester@outlook.com'
    pwd = 'Thitiwas12345'
    receiver = str(receiver)
    message = """\
Subject: Your new password
"""
    tt = str(newpassword)
    body = '''รหัสผ่านใหม่คือ \n'''
    body = body + tt
    # # body = str(body).encode('utf-8')
    message = str(message) + "\n" + body
    message = message.encode('utf-8')

    try:
        server = smtplib.SMTP('smtp-mail.outlook.com', 587)
        server.starttls()
        server.login(sender, pwd)
        server.sendmail(sender, receiver, message)
        server.quit()
        print("complete")
    except smtplib.SMTPException as ex:
        print(ex)


def randomStringDigits(stringLength=6):
    lettersAndDigits = string.ascii_letters + string.digits
    temp = ''.join(random.choice(lettersAndDigits) for i in range(stringLength))
    temp = temp.upper()
    return temp


newpass = randomStringDigits()
email = str(sys.argv[1])
# email = 'twopee26@gmail.com'
userDb = user.user()
userDb.resetpassword(email=email, newpassword=newpass)
send(newpass, email)
