import pymysql


class Connect:
    def __init__(self):
        self.tablename = "project_thitiwas";
        # self.getConn()

    def getConn(self):
        try:
            db = pymysql.connect("localhost", "thitiwas", "chalo8661", self.tablename,charset='utf8')
            return db
        except Exception as e:
            # print("can\'t connected", self.tablename, "databases")
            print(e)
            return None

    def showData(self):
        try:
            db = self.getConn()
            curser = db.cursor()
            curser.execute("select * from user")
            result = curser.fetchall()
            return result
        except Exception as e:
            print(e)


#
a = Connect()
temp = a.showData()
for i in range(0,len(temp)):
    print("id :\t",temp[i][0],end="\t")
    print("email :\t",temp[i][1])
# a.showMassageTypeMassage("peeghost@hotmail.com")
