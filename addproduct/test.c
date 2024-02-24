#include <stdio.h>
int a = 10;
int main(){
int i;
for(i = 0; i < 2; i++){
a++;
{ static int a = 2; a += i; printf("%d ", a); }
a++; printf("%d ", a);
{ int a = 1; a++; printf("%d ", a); }
}
printf("%d ", a); return 0;
}