import java.util.*;
public class D10516241
{
	public static void main(String args[])
	{
		int i=0, c=0 , grade=0;
				
		for (i=1 ;i<=5 ;i++)
		{
			
			System.out.print("���ơG");		
			System.out.println(i);
			System.out.print("���ơG");	
			Scanner sc = new Scanner(System.in);
			grade=sc.nextInt();
			
			if(grade<=100 && grade>=80)
			{
				System.out.print("���šG");	
				System.out.println(" A ");
			}
			else if(grade<=79 && grade>=70)
			{
				System.out.print("���šG");	
				System.out.println(" B ");
			}
				else if(grade<=69 && grade>=60)
			{
				System.out.print("���šG");	
				System.out.println(" C ");
			}
				else
			{
				System.out.print("���šG");	
				System.out.println(" D ");
			}
				System.out.println("----------------");	
		}
		
	}
}