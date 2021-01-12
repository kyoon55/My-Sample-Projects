import javax.swing.JOptionPane;
import java.util.*;
public class ArrayInsert {
   public static void main(String args[]){
	
		int[] data = new int[5];
		int currentSize = 0;
		
		for (int x = 0; x < 4; x++) {
			data[x] = x * 5;
			++currentSize;
		}
		
		
		JOptionPane.showMessageDialog(null, Arrays.toString(data)
		+ "\nNum Elements: " + currentSize);

		// When order doesn't matter. Add element to end of array
		// and increment the size		
		//data[currentSize] = 999;
		//++currentSize;
		
		/* When order does matter. Move all of the "valid" elements
		   after the position "to the left" and update size
         
         Assume we want to add in the value 999 to be the 2nd element in the array (position 1)
		*/
		for (int y = currentSize; y > 1; y--) {
			data[y] = data[y - 1];
		}
		data[1] = 999;
		++currentSize;

		JOptionPane.showMessageDialog(null, Arrays.toString(data)
		+ "\nNum Elements: " + currentSize);
   }
}

