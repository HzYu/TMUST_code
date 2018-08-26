using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApplication1
{
    class Takming
    {
        public string Std_id , Std_name , College_ ;  
        public static int Std_num_Fin_{get;set;}//計數財經目前有幾位學生
        public static int Std_num_Mana_ { get; set; }//計數管理目前有幾位學生
        public static int Std_num_Infor_ { get; set; }//計數資訊目前有幾位學生
        private double Std_Chin_ , Std_Eng_ , Std_Math_ ;      
        public double Avg { get ; set;} //算平均

        public void Basic_information(Takming[] Std_list, string College, int i)
        {
            Console.Write("學號：");
            this.Std_id = Console.ReadLine();
            Console.Write("姓名：");
            this.Std_name = Console.ReadLine();
            //Console.Write("學院（財經、管理、資訊）：");
            //this.College = Console.ReadLine();
            Console.Write("國文成績：");
            this.Std_Chin = double.Parse(Console.ReadLine());
            Console.Write("英文成績：");
            this.Std_Eng = double.Parse(Console.ReadLine());
            Console.Write("數學成績：");
            this.Std_Math = double.Parse(Console.ReadLine());
            Std_list[i-1] = new Takming { Std_id = this.Std_id, Std_name = this.Std_name , College_ = College  };  // 將輸入的資料放入類別陣列裡
        }

        public static void Std_num_Fin()//計數第幾位學生
        {
            Std_num_Fin_ += 1;
            Console.Write("目前建立第 " + Std_num_Fin_ + " 為財經學生\n");
        }

        public static void Std_num_Mana()
        {
            Std_num_Mana_ += 1;
            Console.Write("目前建立第 " + Std_num_Mana_ + " 為管理學生\n");
        }

        public static void Std_num_Infor()
        {
            Std_num_Infor_ += 1;
            Console.Write("目前建立第 " + Std_num_Infor_ + " 為資訊學生\n");
        }

        public double Std_Chin//判斷國文成績是否在1~100
        {
            get { return Std_Chin_ ; }
            set
            {
                if (value > 100)
                {
                    value = 100;
                    Std_Chin_ = value;
                }
                else if (value < 0)
                {
                    value = 0;
                }
                else
                    Std_Chin_ = value;
            }
        }
        public double Std_Eng//判斷英文成績是否在1~100
        {
            get { return Std_Eng_; }
            set
            {
                if (value > 100)
                {
                    value = 100;
                    Std_Eng_ = value;
                }
                else if (value < 0)
                {
                    value = 0;
                }
                else
                    Std_Eng_ = value;
            }
        }
        public double Std_Math//判斷數學成績是否在1~100
        {
            get { return Std_Math_; }
            set
            {
                if (value > 100)
                {
                    value = 100;
                    Std_Math_ = value;
                }
                else if (value < 0)
                {
                    value = 0;
                }
                else
                    Std_Math_ = value;
            }
        }
        public virtual double sum()//基本科目加總
        {
            this.Avg = this.Std_Chin + this.Std_Eng +this.Std_Math ;
            return this.Avg;
        }
    }
    class Finance : Takming    //財經
    {
        private double Std_analysis_;
        private double Std_Econ_; 
      
        public double Std_analysis//判斷分數是否在1~100
        {
            get { return Std_analysis_; }
            set
            {
                if (value > 100)
                {
                    value = 100;
                    Std_analysis_ = value;
                }
                else if (value < 0)
                {
                    value = 0;
                }
                else
                    Std_analysis_ = value;
            }
        }
        public double Std_Econ//判斷分數是否在1~100
        {
            get { return Std_Econ_; }
            set
            {
                if (value > 100)
                {
                    value = 100;
                    Std_Econ_ = value;
                }
                else if (value < 0)
                {
                    value = 0;
                }
                else
                    Std_Econ_ = value;
            }
        }

        public void Basic_Finance()
        {
            Console.Write("財務分析：");
            this.Std_analysis = double.Parse(Console.ReadLine());
            Console.Write("經濟學：");
            this.Std_Econ = double.Parse(Console.ReadLine());
        }

        public override double sum()//複寫父類別的加總，把財經分數加進去
        {
            base.sum();
            base.Avg = (base.Avg + this.Std_analysis + this.Std_Econ) ;
            return base.Avg;
        }
    }

    class Management : Takming//管理
    {
        private double Std_Manag_;
        private double Std_Proj_;

        public double Std_Manag//判斷分數是否在1~100
        {
            get { return Std_Manag_; }
            set
            {
                if (value > 100)
                {
                    value = 100;
                    Std_Manag_ = value;
                }
                else if (value < 0)
                {
                    value = 0;
                }
                else
                    Std_Manag_ = value;
            }
        }
        public double Std_Proj//判斷分數是否在1~100
        {
            get { return Std_Proj_; }
            set
            {
                if (value > 100)
                {
                    value = 100;
                    Std_Proj_ = value;
                }
                else if (value < 0)
                {
                    value = 0;
                }
                else
                    Std_Proj_ = value;
            }
        }

        public void Basic_Management()
        {
            Console.Write("管理學：");
            this.Std_Manag = double.Parse(Console.ReadLine());
            Console.Write("專業課程：");
            this.Std_Proj  = double.Parse(Console.ReadLine());
        }

        public override double sum()//複寫父類別的加總，把管理分數加進去
        {
            base.sum();
            base.Avg = (base.Avg + this.Std_Manag + this.Std_Proj);
            return base.Avg;
        }
    }

    class Information : Takming//資訊
    {
        private double Std_CS_;
        private double Std_DS_;

        public double Std_CS//判斷分數是否在1~100
        {
            get { return Std_CS_; }
            set
            {
                if (value > 100)
                {
                    value = 100;
                    Std_CS_ = value;
                }
                else if (value < 0)
                {
                    value = 0;
                }
                else
                    Std_CS_ = value;
            }
        }
        public double Std_DS//判斷分數是否在1~100
        {
            get { return Std_DS_; }
            set
            {
                if (value > 100)
                {
                    value = 100;
                    Std_DS_ = value;
                }
                else if (value < 0)
                {
                    value = 0;
                }
                else
                    Std_DS_ = value;
            }
        }

        public void Basic_Information()
        {
            Console.Write("程式設計：");
            this.Std_CS = double.Parse(Console.ReadLine());
            Console.Write("資料結構：");
            this.Std_DS = double.Parse(Console.ReadLine());
        }

        public override double sum()//複寫父類別的加總，把資訊分數加進去
        {
            base.sum();
            this.Avg = (this.Avg + this.Std_CS + this.Std_DS);
            return this.Avg;
        }
    }

    class Program
    {
        static void Main(string[] args)
        {
            Takming Basic_takming = new Takming();
            Finance Basic_finance = new Finance();
            Management Basic_Management = new Management();
            Information Basic_Information = new Information();
            
            int Fin_num = 0, Mana_num = 0 , Infor_num = 0 ,Std_all=0 , c=0 ;
            
            Console.Write("要建立幾位財經學生：");
            Fin_num = int.Parse (Console.ReadLine());
            Console.Write("要建立幾位管理學生：");
            Mana_num = int.Parse(Console.ReadLine());
            Console.Write("要建立幾位資訊學生：");
            Infor_num = int.Parse(Console.ReadLine());
            Std_all = Fin_num + Mana_num + Infor_num;
            
            Takming [] Std_list= new Takming [Std_all];
            double [] Std_avg = new double[Std_all];
         //   int [,] Std_list = new int [7,Fin_num];

            Console.Write("-----------------------------------\n");

            for (int i = 0; i < Fin_num;i++)
            {
                c += 1;
                Takming.Std_num_Fin();//人數計數
                Basic_takming.Basic_information(Std_list, "財經", c);//把學生存入陣列裡
                Basic_takming.sum();//基本資料加總
                Basic_finance.Basic_Finance();//輸入財經的成績
                Basic_finance.sum();//財經的成績加總
                Std_avg[c - 1] = (Basic_takming.Avg + Basic_finance.Avg)/5;//算出學生的平均
            }
            
            for (int i = 0; i < Mana_num; i++)
            {
                c += 1;
                Takming.Std_num_Mana();//人數計數
                Basic_takming.Basic_information(Std_list, "管理", c);//把學生存入陣列裡
                Basic_takming.sum();//基本資料加總
                Basic_Management.Basic_Management();//輸入管理的成績
                Basic_Management.sum();//管理的成績加總
                Std_avg[c - 1] = (Basic_takming.Avg + Basic_Management.Avg) / 5;//算出學生的平均
            }

            for (int i = 0; i < Infor_num; i++)
            {
                c += 1;
                Takming.Std_num_Infor();//人數計數
                Basic_takming.Basic_information(Std_list, "資訊", c);//把學生存入陣列裡
                Basic_takming.sum();//基本資料加總
                Basic_Information.Basic_Information();//輸入資訊的成績
                Basic_Information.sum();//資訊的成績加總
                Std_avg[c - 1] = (Basic_takming.Avg + Basic_Information.Avg) / 5;//算出學生的平均
            }

            Console.Write("-------------------------\n");

            Array.Sort(Std_avg, Std_list);//由小到大排序
            Array.Reverse(Std_avg);//變由大到小排序
            Array.Reverse(Std_list);

            for (int i = 0; i < Std_all;i++ )//輸出名次和學生資料
            {
                Console.Write("第" + (i+1) + "名\n");
                Console.Write("學號：" + Std_list[i].Std_id+"\n"+"姓名："+Std_list [i].Std_name+"\n"+"學院："+Std_list[i].College_+"\n"+"平均："+Std_avg[i]+"\n\n");
                
            }
                Console.ReadKey(); 
        }
    }
}
