public class OperateService {

    public static String compute(Number value1, Number value2, String operator) throws Exception {

        int result;

        switch (operator) {
            case "+":
                result = value1.getValue() + value2.getValue();
                break;
            case "-":
                result = value1.getValue() - value2.getValue();
                break;
            case "*":
                result = value1.getValue() * value2.getValue();
                break;
            case "/":
                result = value1.getValue() / value2.getValue();
                break;
            default:
                throw new Exception("Ошибка, используйте только -, +, *, /");
        }

        //если первая цифра - римская, кормим методу toRomanNumber
        if (value1.getType() == Number.NumberType.ROME) {
            return ConvertService.toRomanNumber(result);
        } else return String.valueOf(result);
    }
}