import connect
class LineDb:
    def gettoken(self,email):
        connectDb = connect.Connect()
        db = connectDb.getConn()
        curser = db.cursor()
        try:
            sql = "SELECT channel_access_token FROM line WHERE email = '"+email+"'"
            curser.execute(sql)
            result = curser.fetchall()
            # print(result[0][0])
            return result[0][0]
        except Exception as ex:
            print(ex)
            return None
