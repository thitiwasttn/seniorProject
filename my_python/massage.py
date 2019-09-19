import connect
class MassageDb:
    def showMassageDontSent(self):
        try:
            massageDb = connect.Connect()
            db = massageDb.getConn()
            curser = db.cursor()
            # curser.execute("SELECT massageid,email, REPLACE(massage,'\\n','s'),datein,typemassage,type,timeline,target,recipient,dateout FROM `massage` WHERE massage.type = 1 ORDER BY `massage`.`datein` DESC")
            curser.execute("SELECT * FROM `massage` WHERE massage.type = 1 ORDER BY `massage`.`datein` DESC")
            result = curser.fetchall()
            colum = len(result[0])
            # print("colum ==", colum)
            # print("row == ", curser.rowcount)
            # for row in result:
                # for c in range(0,colum):
                # print("massage : ",row[2])
            if result != None:
                return result
            else:
                return None
        except Exception as ex:
            # print(ex)
            return None

    def updateSent(self, massageid):
        try:
            massageDb = connect.Connect()
            db = massageDb.getConn()
            curser = db.cursor()
            sql = "UPDATE massage SET massage.type = 2 WHERE massage.massageid = "+massageid
            curser.execute(sql)
            db.commit()

            # print(sql)
        except Exception as ex:
            print(ex)
    def updateError(self,massageid):
        try:
            massageDb = connect.Connect()
            db = massageDb.getConn()
            curser = db.cursor()
            sql = "UPDATE massage SET massage.type = 3 WHERE massage.massageid = "+massageid
            curser.execute(sql)
            db.commit()

            # print(sql)
        except Exception as ex:
            print(ex)