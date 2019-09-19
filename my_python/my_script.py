from datetime import datetime
import requests
import line
import massage
import threading


def broadcast(token, text, typem):
    headers = {
        'Content-type': 'application/json',
        'Authorization': 'Bearer ' + token}
    if typem == "text":

        a = text.replace('\r\n', "\\n")
        # a = a.replace('\'',"\\'")
        a = a.replace('\"','\\"')
        # a = text

        # print("input : ", a)
        m = '"type":"text","text":"' + a + '"'
        # data = '{"messages":[{' + m + ']}'
        # print("output : ", m)
        data = '{"messages":[{' + m + '}]}'
        data = data.encode('utf-8')
        response = requests.post('https://api.line.me/v2/bot/message/broadcast', headers=headers, data=data)
    elif typem == "image":
        m = '"type":"image",' \
            '"originalContentUrl":"http://192.168.1.35/project/image/'+text+'",' \
            '"previewImageUrl":"http://192.168.1.35/project/image/'+text+'"'
        # print(m)
        # data = '{"messages":[' + m + ']}'
        data = '{"messages":[{' + m + '}]}'
        data = data.encode('utf-8')
        response = requests.post('https://api.line.me/v2/bot/message/broadcast', headers=headers, data=data)
    elif typem == "sticker":
        m = '"type": "sticker",' \
            '"packageId": "1",' \
            '"stickerId": "1"'
        # print(m)

        data = '{"messages":[{' + m + '}]}'
        data = data.encode('utf-8')
        response = requests.post('https://api.line.me/v2/bot/message/broadcast', headers=headers, data=data)
    # if response.status_code == 200:
    #     # print(response)
    #     # print("done")
    #     return True
    # else:
    #     return False
    print(response)
    return check_sent(response)


def check_sent(response):
    if response.status_code == 200:
        # print(response)
        # print("done")
        return True
    else:
        return False
        # print(response)


def check(targettime):
    try:
        # time in current
        current_time = datetime.timestamp(datetime.now())
        # print(datetime.now())
        # time in future
        # target_time = current_time - targettime

        # time1 = datetime.fromtimestamp(current_time)
        # time2 = datetime.fromtimestamp(targettime)

        # print("current_time : ", time1, " : ", current_time)
        # print("target time  : ", time2, " : ", targettime)
        # print(current_time-targettime)
        if (targettime - current_time) <= 0:
            # print("pass ", abs(targettime - current_time), "sec ")
            # print("pass ", str(timedelta(seconds=int(abs(targettime - current_time)))), "sec ")
            return True
        elif (targettime - current_time) > 0:
            # print("อีก", targettime - current_time, "วิ ส่ง ")
            # print("อีก", str(timedelta(seconds=int(targettime - current_time))), "วินาที ส่ง ")
            return False

    except Exception as ex:
        print(ex)


def edittext(text):
    myText = str(text)
    myText = myText.replace("\n", "n")
    # print(mytext.replace("\n",""))
    # print(mytext)
    return myText

massageDb = massage.MassageDb()
def run():
    try:

        result = massageDb.showMassageDontSent()
        # print(result != None)
        if result != None:  # result != false
            # print("test")
            for row in result:
                # print(row[9])
                # print("test")
                targettime = datetime.timestamp(row[9])
                # targettime = row[9]
                # print(row[4])

                # print("*************************")
                if check(targettime):  # sent
                    # print("id : ",row[0])
                    # print("*************************")
                    mid = row[0]
                    text = str(row[2])
                    email = row[1]
                    token = line.LineDb().gettoken(email)
                    if row[4] == "text":
                        if broadcast(token, text, "text"):
                            # print("****************sent*****************")
                            massageDb.updateSent(str(mid))
                        else:
                            massageDb.updateError(str(mid))
                    elif row[4] == "image":
                        if broadcast(token, text, "image"):
                            massageDb.updateSent(str(mid))
                        else:
                            massageDb.updateError(str(mid))
                    elif row[4] == "sticker":
                        if broadcast(token, text, "sticker"):
                            massageDb.updateSent(str(mid))
                        else:
                            massageDb.updateError(str(mid))
    except Exception as ex:

        # print(ex)
        # print("")
        # else:
        #     print("")
        # print("id : ", id)
        # print("massage : ", text)
        # print("email : ", email)
        # token = line.LineDb().gettoken(email)
        # print("token : ", token)
        # print("*************************")

    # print(result[0][9])
    # print(result[0][2])

    # print(targettime)
        print(ex)
        return False

textrun = "***********************************************************************************\n" \
          "***********************************************************************************\n" \
          "***********************************************************************************\n" \
          "\n" \
          "********************      ******              ******    ******               ******\n" \
          "**********************    ******              ******    ********             ******\n" \
          "******         ********   ******              ******    **********           ******\n" \
          "******          ********  ******              ******    ************         ******\n" \
          "******         ********   ******              ******    ****** ******        ******\n" \
          "**********************    ******              ******    ******   ******      ******\n" \
          "********************      ******              ******    ******    ******     ******\n" \
          "**************            ******              ******    ******      ******   ******\n" \
          "******* *******           ******              ******    ******       ******  ******\n" \
          "******   ********         ******              ******    ******         ************\n" \
          "******    ********         *******         *******      ******           **********\n" \
          "******     ********          *******************        ******             ********\n" \
          "******      ********           ***************          ******               ******\n" \
          "\n" \
          "***********************************************************************************\n" \
          "***********************************************************************************\n" \
          "***********************************************************************************\n"
#print(textrun)
# while True:
run()

def use():
  threading.Timer(1.0, use).start()
  run()
  # print ("Hello, World!")

# use()
# run()

# check()
# token = 'e0nUbaS/JvD0KWbELDxG3K899wU26MpwPCYCEGxheahI+yJo1Xa5Gsw5zI5zfJUmxZ61fy/kGcxRRk+w2U5z7lB0/ScB2pCWRYg9Xt28JzM6YiJ3gVZj7qU0Tl0DJ97oG10D3agEYmXDUhuDRkMYtwdB04t89/1O/w1cDnyilFU='
#
# text= "tew\n" \
#       "tesd"
# bordcast(token, text, "text")
