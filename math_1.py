import math

def isPrime(n):
    if n <= 1:
        return False
    for i in range(2, int(math.sqrt(n)) + 1):
        if n % i == 0:
            return False
    return True

number = 600851475143
n = int(math.sqrt(number))

while n > 0:
    if number % n == 0 and isPrime(n):
        print(n)
        break
    n -= 1
