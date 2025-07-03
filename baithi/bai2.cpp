#include <stdio.h>
int isPrime(int a){
	int flag=1;
	for(int i=2;i<a;i++){
		if(a%i==0){
			flag=0;
			break;
		}
	}
	return flag;
}

int main(){
	int n;
	do{
		printf("Nhap so nguyen duong n = ");
		scanf("%d",&n);
		if(n<=0) printf("Vui long nhap so nguyen duong n>0.\n");
	}while(n<=0);
	if(n==1){
		printf("%d khong phai la so nguyen to.",n);
	}else if(isPrime(n)){
		printf("%d la so nguyen to.",n);
	}else{
		printf("%d khong phai la so nguyen to.",n);
	}
}
