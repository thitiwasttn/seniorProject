class P1:
    # def tel(s):
    #
    #     tel = ''
    #     for i in s:
    #         if i == '-':
    #             continue
    #         else:
    #             # print(i, end='')
    #             tel = tel + i
    #             # print("")
    #             # print(tel,end='')
    #     # print("")
    #     # print(tel, end="")
    #     return tel
    # a = tel(input('your phone number : '))
    # print(type(a))
    # print(a)
    # print(type(tel('11')))

    # def infitityLoop():
    #     i = 0
    #     a = ''
    #     while i == 0:
    #         try:
    #             a = int(input("enter your num : "))
    #             print('your number is : ', a)
    #         except Exception as e:
    #             # print(e)
    # #
    # absolute
    # print(abs(-45))
    # def funM():
    #     x = 30
    #     print(x)
    #     def funS():
    #         x = 48
    #         print(x)
    #     funS()
    # funM()
    # def t(v1 = 15,v2 = 3):
    #     print(v1,v2)
    #     if v1>v2:
    #         print("max is ",v1)
    #     else:
    #         print("min is ",v2)
    # t(1,2)
    # t()
    def __init__(self, w, h, x):
        # self.useTest2()
        self.w = w
        self.h = h
        self.x = x

        # s = 'aa 123 aa'

    # def __str__(self):
    #     return "({0},{1},{2})".format(self.w, self.h,self.x)

    # print(s.count('1'))
    # print(s.find('1'))
    # print(s.lower())
    # print(s.upper())
    # print(max(s),min(s))
    def ex_str(self):
        a = self.s.split(" ")
        b = ['a', '345']
        print("var a :", a)
        print("var b :", b)
        print('*********************')
        # def cmp(a, b):
        #     return (a > b) - (a < b)
        # print('max in var a :',max(a))
        # print('max in var b :',max(b))
        # print('min in var a :',min(a))
        # print('min in var b :',min(b))
        a.append("ooa")
        print("var a after append :", a)
        # a.extend(b)
        # print(a)
        a.insert(1, "cs")
        print(a)
        a.remove('cs')
        print(a)
        print('*********************')
        # print(str('a', 'utf-8'))
        num = [1, 3, 9, 120, 0, 14, -45]
        num.sort()
        print(num)
        str1 = ['v', 'a', 'c', 'z']
        str1.sort()
        print(str1)

    def ex_dic(self):
        a = {'k1': 'v1', 'k2': 'v2', 'k3': 'v3'}
        print(type(a))
        print(a)
        print("*******************************")
        print("len a :", a.__len__())
        print('key 1 :', a.get('k1'))
        print(a)
        print("*******************************")
        print(a.keys())
        print(a.values())

    def ex_list(self):
        a = ['a', 'b', 'c', 'd']
        print(a)
        print("*****************")
        b = ['1', '2', '3', '4']
        print(b)
        print("*****************")
        a = a + b
        print(a)

    def test(self):
        print("print from P1")

    def __test2(self):
        print("test2")

    def useTest2(self):
        print("ss")
        self.__test2()


pp = P1(12, 13, 45)
print(pp)
# print("++++++++++++++++++++++++++")
# pp2 = P1(1, 2, 3)
# print(pp2)
# print(pp+""+pp2)
