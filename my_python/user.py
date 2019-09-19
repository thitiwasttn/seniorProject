import connect
class user:

    def resetpassword(self,email,newpassword):
        try:
            userDb = connect.Connect()
            db = userDb.getConn()
            curser = db.cursor()
            query = "UPDATE user SET password = '" + str(newpassword) + "' WHERE email = '" + str(email) + "'"
            # print(query)
            curser.execute(query)
            db.commit()
            return True
        except Exception as ex:
            return str(ex)