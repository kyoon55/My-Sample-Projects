import javax.swing.JOptionPane;
public class LinearSearch {
   public static void main(String args[]){
	
		int[] data = {1, 2, 4};
		int searchValue = 2;
		int position = 0;
		boolean found = false;
		
		while (position < data.length && !found) {
			if (data[position] == searchValue) {
				found = true;
			}
			else {
				++position;
			}
		}
		if (found) {
			JOptionPane.showMessageDialog(null, "Found at position: " + position);
		}
		else {
			JOptionPane.showMessageDialog(null, "Not found");
		}
	
   }
}

