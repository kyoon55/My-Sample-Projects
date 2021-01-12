import javax.swing.JOptionPane;

public class GUIInputExample {
	public static void main(String[] args) {
		String name;
		int age;
		double gpa;
		name = JOptionPane.showInputDialog("Enter your name:");
		age = Integer.parseInt(JOptionPane.showInputDialog("Enter your age:"));
		gpa = Double.parseDouble(JOptionPane.showInputDialog("Enter your GPA:"));
		JOptionPane.showMessageDialog(null, "Hello, " + name + "! You said you are "
		+ age + " years old and have a GPA of " + gpa);
	}
}

