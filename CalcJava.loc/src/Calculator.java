import java.util.Scanner;

public class Calculator {
    public static void main(String[] args) {

        Scanner scanner = new Scanner(System.in);

        //вращаем бесконечный цикл
        while (true) {

            System.out.print("Выражение в формате `1 + 1`: ");
            String input = scanner.nextLine();

            try {
                String[] letters = input.split("\\s+");
                if (letters.length != 3) throw new Exception("Введите выражение в формате `1 + 1` или `X + X`");

                //используем суперкласс Number как обертку для примитивов
                Number Num1 = ConvertService.checkType(letters[0]);
                Number Num2 = ConvertService.checkType(letters[2], Num1.getType());
                String output = OperateService.compute(Num1, Num2, letters[1]);
                System.out.println("Output: "+ output);

            } catch (Exception e) {
                System.out.println(e.getMessage());
                break;
            }
        }
        //закрыть сканер, посокльку вращается цикл
        scanner.close();
    }
}