window.onload = function() {  // Funkcja wywołana po załadowaniu strony

    var jqueryfun;  // Zmienna do przechowywania funkcji jQuery

    $(function() {  // Główna funkcja jQuery, która zostanie wykonana po załadowaniu DOM

        // Obsługa zdarzeń dla logo Git - po najechaniu kursorem powiększa się, a po opuszczeniu wraca do pierwotnego rozmiaru
        $(".git_logo").mouseenter(function() {
            $(this).animate({
                width: "60px",
                height: "60px"
            });
        }).mouseleave(function() {
            $(this).animate({
                width: "50px",
                height: "50px"
            });
        });

        // Funkcja jQuery uruchamiana po wystąpieniu błędu, wyświetla komunikat o błędzie
        jqueryfun = function slide()
        {
            if ($(".error").is(":hidden")) {  // Sprawdza, czy element o klasie "error" jest ukryty
                $(".error").slideDown("slow");  // Powoli rozwija element błędu
            }

            // Kliknięcie w komunikat o błędzie powoduje jego zwinięcie
            $(".error").click(function() {
                $(this).slideUp("slow");
            });
        }
    });

    // Funkcja czyszcząca wynik i ustawiająca domyślny rozmiar czcionki
    function clear_result() {
        document.querySelector(".result").innerHTML = str = "";  // Czyści zawartość elementu wynikowego i zmiennej str
        document.querySelector(".result").style.fontSize = "25px";  // Ustawia domyślny rozmiar czcionki
    }

    // Funkcja wywoływana, gdy długość ciągu przekracza pewien limit
    function alert_length() {
        jqueryfun();  // Uruchamia funkcję wyświetlającą komunikat o błędzie
        clear_result();  // Czyści wynik
    }

    // Funkcja zmieniająca rozmiar czcionki w zależności od długości ciągu
    function new_line() {
        if (str.length > 19) {
            document.querySelector(".result").style.fontSize = "20px";  // Zmniejsza czcionkę, gdy ciąg jest dłuższy niż 19 znaków
        }
        if (str.length > 25) {
            document.querySelector(".result").style.fontSize = "15px";  // Zmniejsza czcionkę jeszcze bardziej, gdy ciąg jest dłuższy niż 25 znaków
        }
        if (str.length >= 33) {
            alert_length();  // Jeśli ciąg ma 33 lub więcej znaków, wyświetla komunikat o błędzie
        }
        console.log(str.length);  // Wypisuje długość ciągu do konsoli
    }

    // Pobranie elementów z DOM
    const clear = document.querySelector(".ce");  // Przycisk do czyszczenia
    const buttons = document.querySelectorAll(".number");  // Przycisk do cyfr
    const operations = document.querySelectorAll(".operation");  // Przycisk do operacji arytmetycznych
    const equal = document.querySelector(".equal");  // Przycisk równości
    var str = "";  // Zmienna przechowująca ciąg wprowadzanych wartości
    var result;  // Zmienna na wynik

    // Obsługa kliknięć na przyciskach z cyframi
    buttons.forEach(el => {
        el.addEventListener("click", () => {
            document.querySelector(".result").innerHTML = str += el.value;  // Dodaje wartość przycisku do wyniku
            new_line();  // Sprawdza długość ciągu i dostosowuje czcionkę
        });
    });

    // Obsługa kliknięć na przyciskach operacji arytmetycznych
    operations.forEach(el => {
        el.addEventListener("click", () => {
            document.querySelector(".result").innerHTML = str += el.value;  // Dodaje znak operacji do ciągu
            new_line();  // Sprawdza długość ciągu i dostosowuje czcionkę
        });
    });

    // Obsługa kliknięcia na przycisk "CE" do czyszczenia wyniku
    clear.addEventListener("click", () => {
        clear_result();  // Czyści wynik
    });

    // Obsługa kliknięcia na przycisk równości "="
    equal.addEventListener("click", () => {
        // Sprawdza, jaką operację arytmetyczną użytkownik wybrał i wykonuje odpowiednie działanie
        if (str.includes("+") == true) {
            result = str.split("+");  // Dzieli ciąg po znaku "+"
            let parsed1 = parseFloat(result[0]);  // Parsuje pierwszą liczbę
            let parsed2 = parseFloat(result[1]);  // Parsuje drugą liczbę
            let equal = parsed1 + parsed2;  // Dodaje liczby
            document.querySelector(".result").innerHTML = equal;  // Wyświetla wynik
        }
        if (str.includes("-") == true) {
            result = str.split("-");  // Dzieli ciąg po znaku "-"
            let parsed1 = parseFloat(result[0]);
            let parsed2 = parseFloat(result[1]);
            let equal = parsed1 - parsed2;  // Odejmuje liczby
            document.querySelector(".result").innerHTML = equal;
        }
        if (str.includes("*") == true) {
            result = str.split("*");  // Dzieli ciąg po znaku "*"
            let parsed1 = parseFloat(result[0]);
            let parsed2 = parseFloat(result[1]);
            let equal = parsed1 * parsed2;  // Mnoży liczby
            document.querySelector(".result").innerHTML = equal;
        }
        if (str.includes("/") == true) {
            result = str.split("/");  // Dzieli ciąg po znaku "/"
            let parsed1 = parseFloat(result[0]);
            let parsed2 = parseFloat(result[1]);
            let equal = parsed1 / parsed2;  // Dzieli liczby
            document.querySelector(".result").innerHTML = equal;
        }
        if (str.includes("%") == true) {
            result = str.split("%");  // Dzieli ciąg po znaku "%"
            let parsed1 = parseFloat(result[0]);
            let parsed2 = parseFloat(result[1]);
            let equal = parsed1 % parsed2;  // Oblicza resztę z dzielenia
            document.querySelector(".result").innerHTML = equal;
        }
        new_line();  // Sprawdza długość ciągu i dostosowuje czcionkę
    });
}
