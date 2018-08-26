using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Collections;  // 匯入System.Collections命名空間

namespace WindowsFormsApplication1
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        class member
        {
            public int No { get; set; }
            public string Name { get; set; }             
        }

        Stack<member> St = new Stack<member>();
        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                if (textBox1.Text == null || textBox2.Text == null) return;

                label3.Text = "";
                St.Push(new member() { No = int.Parse(textBox1.Text), Name = textBox2.Text });
                //st.Pop();移除最上層
                foreach (member i in St)
                {
                    label3.Text += "No：" + Convert.ToString(i.No) + "  " + "Name：" + i.Name + "\n";
                }                      
            }
            catch(Exception ex)
            {
                MessageBox.Show("資料未輸入或輸入錯誤");
            }
                   
        }
        Queue<member> Qu = new Queue<member>();
        private void button2_Click(object sender, EventArgs e)
        {
            try
            {
                if (textBox1.Text == null || textBox2.Text == null) return;
                label4.Text = "";

                Qu.Enqueue(new member() { No = int.Parse(textBox1.Text), Name = textBox2.Text });
                // Qu.Dequeue();移除最上層
                foreach (member i in Qu)
                {
                    label4.Text += "No：" + Convert.ToString(i.No) + "  " + "Name：" + i.Name + "\n";
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show("資料未輸入或輸入錯誤");
            }
        }
        Dictionary<string, member> HT = new Dictionary<string, member>();
        private void button3_Click(object sender, EventArgs e)
        {
            try
            {
                if (textBox1.Text == null || textBox2.Text == null) return;
                label5.Text = "";
                HT.Add(textBox2.Text, new member() { No = int.Parse(textBox1.Text), Name = textBox2.Text });

                foreach (KeyValuePair<string, member> i in HT)
                {
                    label5.Text += "No：" + Convert.ToString(i.Value.No) + "  " + "Name：" + i.Value.Name + "\n";
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show("資料未輸入或輸入錯誤");
            }
        }

    }
}
