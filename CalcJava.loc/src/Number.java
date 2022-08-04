class Number {

    public enum NumberType {
        ROME,
        ARAB,
    }

    private int value;
    private NumberType type;

    NumberType getType() {
        return type;
    }
    int getValue() {
        return value;
    }

    //инициализируем конструктор класса
    Number(int value, NumberType type) {
        this.value = value;
        this.type = type;
    }
}