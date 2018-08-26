using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApplication8
{
    class Student
    {
        public string id;
        public string Sname;
        private int chi_;
        private int eng_;
        private int bcc_;
        public static int Num { get ; set; }
        
        public Student (string id ,string Sname,int chi,int eng,int bcc) 
        {
            this.id = id;
            this.Sname = Sname;
            this.chi = chi;
            this.eng = eng;
            this.bcc = bcc;
            Num += 1;
            
        }

        public static void ShowNum()  //目前建立幾位學生
        {
           if(Num==0)
           {
               Num = 1;
           }
            Console.Write("\n目前建立 第" + Num + "位 學生\n");
        }

        public static void GetStudentNum()
        { 
            Console.Write("\n目前共建立 " + (Num-1) + " 位學生的資料！！");
        }

        public int chi
        {
            get { return chi_; }
            set
            {
                if (value < 1)
                    value = 0;
                else if (value > 100)
                {
                    value = 100;
                    chi_ = value;
                } 
                else
                    chi_ = value;
            }
        }

        public int eng
        {
            get { return eng_; }
            set
            {
                if (value < 0)
                    value = 0;
                else if (value > 100)
                {
                    value = 100;
                    eng_ = value;
                }
                else
                    eng_ = value;    
            }
        }
        public int bcc
        {
            get { return bcc_; }
            set
            {
                if (value < 0)
                    value = 0;
                else if (value > 100)
                {
                    value = 100;
                    bcc_ = value;
                }
                else
                    bcc_ = value;
            }
        }

        public static int GetAvg(int chi , int eng ,int bcc)
        {
            int Avg = 0;
            Avg = (chi + eng + bcc) / 3;
            return Avg;
        }
    }

    class Program
    {
        static void Main(string[] args)
        {
            string id = "", Sname = "";
            int chi=0 , eng=0 , bcc=0 ,std_num=0;
            Console.Write("請輸入要建立幾位學生的人數：");
            std_num = int.Parse(Console.ReadLine());
            Student [] std= new Student [std_num];

            for (int i=0 ; i<std_num ;i++)
            {
                Student.ShowNum();
                Console.Write("\n1.學號：");
                id = Console.ReadLine();
                Console.Write("2.姓名：");
                Sname = Console.ReadLine();
                Console.Write("3.國文：");
                chi = int.Parse(Console.ReadLine());
                Console.Write("4.英文：");
                eng =int.Parse(Console.ReadLine());
                Console.Write("5.計概：");
                bcc =int.Parse( Console.ReadLine());
                std[i] = new Student(id,Sname,chi,eng,bcc);
            }
            Student.GetStudentNum();

            Console.Write("\n-----------------------------------------------------\n");
            string search_name;
            int search_num=0;
            Console.Write("\n請問要尋找哪位學生（以姓名尋找）：");
            search_name = Console.ReadLine();

            for (int i = 0; i < std_num ; i++ )
            {
                if (std[i].Sname == search_name)
                {
                    search_num = i;
                    Console.Write("尋找的資料如下：\n");
                    Console.WriteLine("\n1.姓名：" + std[search_num].Sname);
                    Console.WriteLine("2.學號：" + std[search_num].id);
                    Console.WriteLine("3.國文：" + std[search_num].chi);
                    Console.WriteLine("4.英文：" + std[search_num].eng);
                    Console.WriteLine("5.計概：" + std[search_num].bcc);
                    Console.WriteLine("6.平均：" + Student.GetAvg(std[search_num].chi, std[search_num].eng, std[search_num].bcc) + "\n");
                }
            }
 
            if (search_num ==0)
            {
                Console.Write("\n找不到 " + search_name + " 學生的資料......\n");
            }
            Student.GetStudentNum();
            Console.Read();
        }
    }
}
