using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace D10516241_11_2
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }
        string name = "";
        string [] goods = new string [5];
        int c = 0;
        private void button1_Click(object sender, EventArgs e)
        {
            c = 0;
            label4.Text = "";
            name = textBox1.Text;
            int goods_item = 0;
            for (int i = 0; i < 5; i++)
            {
                if(checkedListBox1 .GetItemChecked (i))
                {

                    goods[c] = i.ToString();
                    c += 1;
                }
            }
            label4.Text = name + "你好！\n你購買的遊戲機有：";
            for (int i = 0; i < c; i++ )
            {
                goods_item = int.Parse (goods[i]);
                label4.Text +=  checkedListBox1.Items[goods_item].ToString()+",";
            }
       
            label4.Text += "\n付款方式：";
          
            if(radioButton1 .Checked ==true)
            {
                label4.Text += radioButton1.Text;
            }
            else if(radioButton2 .Checked == true )
            {
                label4.Text += radioButton2.Text;
            }          
                
        }
    }
}
