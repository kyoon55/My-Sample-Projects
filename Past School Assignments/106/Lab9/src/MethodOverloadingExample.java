import javax.swing.JOptionPane;
import java.util.Arrays;

public class MethodOverloadingExample {
	public static void main(String[] args) {
		print("A string");
		print(5);
		
		int[] numArray = {1, 2, 3};
		print(numArray);
	}
	
	private static void print(String s) {
		JOptionPane.showMessageDialog(null, "The string you entered was: " + s);
	}
	
	private static void print(int i) {
		JOptionPane.showMessageDialog(null, "The number you entered was: " + i);
	}
	
	private static void print(int[] i) {
		JOptionPane.showMessageDialog(null, "The array you entered was: " + Arrays.toString(i));
	}
}

