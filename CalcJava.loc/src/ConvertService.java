import java.util.Map;
import java.util.TreeMap;

class ConvertService {

    //юзаем мапу вместо двух массивов для удобства
    //string [] arab = new string[10]{"10","1","2","3","4","5","6","7","8","9"};
    //string [] rome = new string[10]{"X","I","II","III","IV","V","VI","VII","VIII","IX"};
    private final static TreeMap < Integer, String > mapRome = new TreeMap<>();

    static {
        mapRome.put(1, "I");
        mapRome.put(4, "IV");
        mapRome.put(5, "V");
        mapRome.put(9, "IX");
        mapRome.put(10, "X");
        mapRome.put(40, "XL");
        mapRome.put(50, "L");
        mapRome.put(90, "XC");
        mapRome.put(100, "C"); //cuz 10 * 10 = 100;
    }

    //проверяем тип пришедшего input
    static Number checkType(String symbol) throws Exception {
        int value;
        Number.NumberType type;

        //приводим ввод к int
        try {
            value = Integer.parseInt(symbol);
            type = Number.NumberType.ARAB;
        }catch (NumberFormatException e) {
            value = toArabicNumber(symbol);
            type = Number.NumberType.ROME;
        }

        //валидация
        if (value < 1 || value > 10) {
            throw new Exception("Ошибка, используйте числа от 1 до 10 включительно");
        }
        return new Number(value, type);
    }

    static Number checkType(String symbol, Number.NumberType type) throws Exception {
        Number number = checkType(symbol);
        if (number.getType() != type) {
            throw new Exception("Введены разные системы чисел, используйте один тип вводных значений");
        }
        return number;
    }

    private static int letterToNumber(char letter) {
        int result = -1;
        for (Map.Entry < Integer, String > entry: mapRome.entrySet()) {
            if (entry.getValue().equals(String.valueOf(letter))) result = entry.getKey();
        }
        return result;
    }

    //если на вход пришли римские цифры
    static int toArabicNumber(String roman) throws Exception {
        int result = 0;

        int i = 0;
        while (i < roman.length()) {
            char letter = roman.charAt(i);
            int num = letterToNumber(letter);

            if (num < 0) throw new Exception("Неверный римский символ");
            i++;

            if (i == roman.length()) {
                result += num;
            }else {
                int nextNum = letterToNumber(roman.charAt(i));
                if(nextNum > num) {
                    result += (nextNum - num);
                    i++;
                }
                else result += num;
            }
        }
        return result;
    }

    static String toRomanNumber(int number) {
        int i = mapRome.floorKey(number);
        if (number == i) {
            return mapRome.get(number);
        }
        return mapRome.get(i) + toRomanNumber(number - i);
    }
}