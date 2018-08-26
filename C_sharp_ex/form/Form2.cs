using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WindowsFormsApplication2
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            toolTip1.SetToolTip(textBox1, "輸入帳號");
            toolTip1.SetToolTip(textBox2, "輸入密碼");
        }

        private void button1_Click(object sender, EventArgs e)
        {

                string user = textBox1.Text;
                string password = textBox2.Text;
                if (user == "德明財經科技大學" && password == "takming")
                {
                    System.Diagnostics.Process.Start("http://www.takming.edu.tw/chinese2012/default.asp");
                }
                else
                {
                    MessageBox.Show("帳號密碼錯誤\n帳號：德明財經科技大學\n密碼：takming");
                }
          
            }

        private void button2_Click(object sender, EventArgs e)
        {
            Close();
        }
    }
    }


