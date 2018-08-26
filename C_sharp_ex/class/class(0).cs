using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApplication2
{
    class people  //建立類別
    {
        private string _employee;
        public string Employee       //value=Employee
        {
            get { return _employee; }
            set { _employee = value; }
        }

        private int _salary;
        public int Salary
        {
            get { return _salary;}
            set
            {
                if (value > 40000)
                    value = 40000;
                else if (value < 20000)
                    value = 20000;
                _salary = value;
            }
        }

        public bool sex;
      
        //初始方法(建構子) 多載
        public people ()
        {
            this.Employee  = "<noname>";    //this = 類別底下的屬性
            this.Salary  = 20000;
            this.sex = true;
        }
        public people (string n) 
        {
            this.Employee  = n;     
        }
        public people (string n , int h) 
        {
            this.Employee = n;     
            this.Salary = h;
        }

        public people(string n, int h ,bool s) 
        {
            this.Employee = n;     
            this.Salary = h;
            this.sex = s ;
        }
        public void addsal()      //基本加薪
        {
            this.Salary += 1000;
        }
        public void addsal(int add) //手動加薪
        {
            this.Salary += add;
        }
        public void print()
        {
            Console.WriteLine("員工：{0}，底薪{1}，性別：{2}", this.Employee, this.Salary, this.sex);
            Console.ReadKey();
        }   
    }    

    class Program
    {
        static void Main(string[] args)
        {
            //people a = new people() { Employee ="<noname>", Salary =100 , sex =10};  沒建立建構子直接設定初始
            people a = new people();
            a.print();

            a.Employee = "Ecir";
            a.addsal(10000);
            a.print();        
        }
    }
}
