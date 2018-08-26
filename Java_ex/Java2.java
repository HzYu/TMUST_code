import java.util.*;
public class D10516241 
{
	public static void main(String args[])
	{
		int a=0,n=0,i=0;
		double c=0;
		
		do
		{
			System.out.print("請輸入一值介於10~20之間：");
			Scanner sc= new Scanner(System.in);
			a=sc.nextInt();
		}	while(a<10 || a>20);
		
//		System.out.println(a);
		
		for(i=1 ;i<=a ; i++)
		{
			if(i%2 != 0)
			{
				c+=1.0/i;
			}
			else
			{
				c-=1.0/i;
			}
		}
		System.out.println(c);
	}
}
