#include <stdio.h>

int main(){
	int n=0;
	int tong=0;
	do{
		printf("Nhap so nguyen duong n = ");
		scanf("%d",&n);
		if(n<=0) printf("Vui long nhap so nguyen duong n>0.\n");
	}while(n<=0);
	for(int i=1;i<=n;i++){
		tong+=i;
	}
		printf("Tong cac so nguyen tu 1 den %d la %d",n,tong);
}
