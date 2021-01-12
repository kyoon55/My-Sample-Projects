import javax.swing.JOptionPane;
import java.util.*;
public class ArrayRemove {
   public static void main(String args[]){
	
		int[] data = new int[5];
		int currentSize = 0;
		
		for (int x = 0; x < 4; x++) {
			data[x] = x * 5;
			++currentSize;
		}
		
		
		JOptionPane.showMessageDialog(null, Arrays.toString(data)
		+ "\nNum Elements: " + currentSize);

		// When order doesn't matter. Replace element to delete
		// in array with last element. Decrement the size of array		
		//data[1] = data[currentSize - 1];
		//--currentSize;
		
		// When order does matter. Move all of the "valid" elements
		// after the position "to the left" and update size
		for (int y = 1; y < currentSize; y++) {
			data[y] = data[y + 1];
		}
		--currentSize;
		

		JOptionPane.showMessageDialog(null, Arrays.toString(data)
		+ "\nNum Elements: " + currentSize);
   }
}

