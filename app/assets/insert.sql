
INSERT INTO `Questionnaire` (`id`, `question`, `id_correction`) VALUES
(1, 'Which interface provides the capability to store objects using a key-value pair?', 'A'),
(2, 'Which one is NOT a java/j2ee framework?', 'D'),
(3, 'Which one is NOT a database written by java', 'C'),
(4, 'public class Test { }What is the prototype of the default constructor?', 'C'),
(5, 'Which is valid declaration of a float?', 'A'),
(6, 'You want a class to have access to members of another class in the same package. Which is the most restrictive access that accomplishes this objective?', 'D'),
(7, 'public class Outer\n{ \n    public void someOuterMethod() \n    {\n        //Line 5 \n    } \n    public class Inner { } \n    public static void main(String[] argv) \n    {\n        Outer ot = new Outer(); \n        //Line 10\n    } \n} \nWhich of the following code fragments inserted, will allow to compile?', 'A'),
(8, 'Which is a valid keyword in java?', 'A'),
(9, 'switch(x) {     default:          System.out.println("Hello"); }Which two are acceptable types for x?	1	byte	2	long	3	char	4	float	5	Short	6	Long', 'A'),
(10, 'Java 8: What''s the output of this code:\nArrays.stream(new int[] {1, 2, 3})\n    .map(n -> 2 * n + 1)\n    .average()\n    .ifPresent(System.out::println); ', 'A');



INSERT INTO `Choix` (`id`, `id_question`, `reponse`) VALUES
('A', 1, 'Java.util.Map'),
('A', 2, 'Strut'),
('A', 3, 'HSQDB'),
('A', 4, 'Test()'),
('A', 5, 'float f = 1F;'),
('A', 6, 'public'),
('A', 7, 'new Inner(); //At line 5'),
('A', 8, 'interface'),
('A', 9, '1 and 3'),
('A', 10, '5'),
('B', 1, 'Java.util.Set'),
('B', 2, 'Spring'),
('B', 3, 'H2'),
('B', 4, 'Test(void)'),
('B', 5, 'float f = 1.0;'),
('B', 6, 'private'),
('B', 7, 'new Inner(); //At line 10'),
('B', 8, 'string'),
('B', 9, '2 and 4'),
('B', 10, '10'),
('C', 1, 'Java.util.List'),
('C', 2, 'Hibernate'),
('C', 3, 'MongoDB'),
('C', 4, 'public Test()'),
('C', 5, 'float f = "1";'),
('C', 6, 'protected'),
('C', 7, 'new ot.Inner(); //At line 10'),
('C', 8, 'float'),
('C', 9, '3 and 5'),
('C', 10, '2'),
('D', 1, 'Java.util.Collection'),
('D', 2, 'Symfony'),
('D', 3, 'HBASE'),
('D', 4, 'public Test(void)'),
('D', 5, 'float f = 1.0d;'),
('D', 6, 'default access'),
('D', 7, 'new Outer.Inner(); //At line 10'),
('D', 8, 'unsigned'),
('D', 9, '4 and 6'),
('D', 10, '12');

