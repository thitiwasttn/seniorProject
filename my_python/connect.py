import pymysql


class Connect:
    def __init__(self):
        self.tablename = "project_thitiwas";
        # self.getConn()

    def getConn(self):
        try:
            db = pymysql.connect("localhost", "thitiwas", "chalo8661", self.tablename,charset='utf8')
            # db.set_charset_collation('utf-8', 'utf8_general_ci')
            return db
        except Exception as e:
            # print("can\'t connected", self.tablename, "databases")
            print(e)
            return None

    def showData(self):
        try:
            curser = self.getConn()
            curser.execute("select * from user where status = 1")
            result = curser.fetchall()
            colum = len(result[0])
            print("colum ==", colum)
            print("row == ", curser.rowcount)
            print("***************************")
            for row in result:
                print("email : ", row[1])
                print("password : ", row[2])
                print("***************************")
        except Exception as e:
            print(e)


#
# a = Connect("project")
# # a.showData()
# a.showMassageTypeMassage("peeghost@hotmail.com")
