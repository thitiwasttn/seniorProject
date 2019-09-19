import requests 

headers = { 
'Content-type': 'application/json', 
'Authorization': 'Bearer {e0nUbaS/JvD0KWbELDxG3K899wU26MpwPCYCEGxheahI+yJo1Xa5Gsw5zI5zfJUmxZ61fy/kGcxRRk+w2U5z7lB0/ScB2pCWRYg9Xt28JzM6YiJ3gVZj7qU0Tl0DJ97oG10D3agEYmXDUhuDRkMYtwdB04t89/1O/w1cDnyilFU=}',
} 

data = '{"messages":[{"type":"text","text":"Test Message"}]}'
data2 = '{"messages":[{\
    "type": "image",\
    "originalContentUrl": "http://192.168.1.35:80/project/image/15587743211919.jpg",\
    "previewImageUrl": "http://192.168.1.35:80/project/image/15587743211919.jpg"\
}]}'

response = requests.post('https://api.line.me/v2/bot/message/broadcast', headers=headers, data=data2)

print(response)
