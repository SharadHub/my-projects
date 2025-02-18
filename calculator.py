def calculate():
    try:
        num1 = float(input("Enter first number: "))
        num2 = float(input("Enter second number: "))
        operation = input("Enter operation (+, -, *, /): ")

        if operation == '+':
            result = num1 + num2
        elif operation == '-':
            result = num1 - num2
        elif operation == '*':
            result = num1 * num2
        elif operation == '/':
            if num2 == 0:
                print("Error: Division by zero!")
                return
            result = num1 / num2
        else:
            print("Invalid operation")
            return

        print(f"Result: {result}")

    except ValueError:
        print("Please enter valid numbers!")
    except Exception as e:
        print(f"An error occurred: {str(e)}")

if __name__ == "__main__":
    calculate()