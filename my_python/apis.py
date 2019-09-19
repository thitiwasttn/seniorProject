import requests
# Search GitHub's repositories for requests
a = input('enter your message : ')

headers = {
'Content-type': 'application/json',
'Authorization': 'Bearer {DPcz6qv89mFcNW+TBKIloJPN6K0FmlCc0Fs0eoHknIQVBOXqonNMI7/ASeGxBa5U/eTINQLm/srOW19jkdXcIZV8nf4VsDW1UqOA5XpGTKjnO34Syv+NjHdEvtzIplEUCZXI7LvjldYJB4TCsVcmPwdB04t89/1O/w1cDnyilFU=}',
}
# a.encode('utf-8')
data = '{' \
       '"messages":[' \
            '{"type":"text",' \
            '"text":"'+a+'"},' \
            '{"type": "sticker",\
            "packageId": "1",\
            "stickerId": "1"}' ']' \
        '}'
# data.encode('utf-8')
response = requests.post('https://api.line.me/v2/bot/message/broadcast', headers=headers, data=data)

print(response,"ff")