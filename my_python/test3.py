import requests

token = 'e0nUbaS/JvD0KWbELDxG3K899wU26MpwPCYCEGxheahI+yJo1Xa5Gsw5zI5zfJUmxZ61fy/kGcxRRk+w2U5z7lB0/ScB2pCWRYg9Xt28JzM6YiJ3gVZj7qU0Tl0DJ97oG10D3agEYmXDUhuDRkMYtwdB04t89/1O/w1cDnyilFU='

massage = "line1\nline22\naa"
# massage = massage.replace("\n","\\n")
headers = {
    'Content-type': 'application/json',
    'Authorization': 'Bearer ' + token}
m = '"type":"text",' \
    '"text":"' + massage+ '"'
# print(m)
print(massage)
data = '{"messages":[{' + m + '}]}'
data = data.encode('utf-8')
# response = requests.post('https://api.line.me/v2/bot/message/broadcast', headers=headers, data=data)
# print(response)
