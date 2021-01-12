import javax.swing.JOptionPane;
import java.util.Arrays;

/* The purpose of this program is to take in a set of numbers and order them from smallest to largest */

public class ProcessThreeNumbers {
	public static void main(String[] args) {
		final int NUM_NUMBERS = 3;
		int[] arrayNumbers = new int[NUM_NUMBERS];
		int tempValue;
		
		for (int x = 1; x <= arrayNumbers.length; x++) {
			arrayNumbers[x - 1] = Integer.parseInt(JOptionPane.showInputDialog("Please enter number " + x));
		}

		while (arrayNumbers[0] != 0 && arrayNumbers[1] != 0 && arrayNumbers[2] != 0) {
		
			// If the first element is greater than the second element, swap the two values
			if (arrayNumbers[0] > arrayNumbers[1]) {
				tempValue = arrayNumbers[0];
				arrayNumbers[0] = arrayNumbers[1];
				arrayNumbers[1] = tempValue;
			}
			
			// If the second element is greater than the third element, swap the two values
			if (arrayNumbers[1] > arrayNumbers[2]) {
				tempValue = arrayNumbers[1];
				arrayNumbers[1] = arrayNumbers[2];
				arrayNumbers[2] = tempValue;
			}		
			
			// If the first element is greater than the second element, swap the two values
			if (arrayNumbers[0] > arrayNumbers[1]) {
				tempValue = arrayNumbers[0];
				arrayNumbers[0] = arrayNumbers[1];
				arrayNumbers[1] = tempValue;
			}
		
			JOptionPane.showMessageDialog(null, Arrays.toString(arrayNumbers));
			
			for (int x = 1; x <= arrayNumbers.length; x++) {
				arrayNumbers[x - 1] = Integer.parseInt(JOptionPane.showInputDialog("Please enter number " + x));
			}
		}
	}
}