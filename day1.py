# Writing to a file
with open("data.txt", "w") as file:
    file.write("Hello, this is a test file!")

# Reading from the file
with open("data.txt", "r") as file:
    content = file.read()
    print("File Content:", content)
