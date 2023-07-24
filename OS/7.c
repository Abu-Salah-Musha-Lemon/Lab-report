//7. Write a C program to simulate Optimal Algorithm
//Source code:
#include<stdio.h>
#include<conio.h>

int fr[5],i,j,k,t[5],p=1,flag=0,page[25],psz,nf,t1,u[5];
clrscr();
printf("enter the number of frames:");
canf("%d",&nf);
printf("\n enter the page size");
canf("%d",&psz);
printf("\nenter the page sequence:");
or(i=1; i<=psz; i++)
scanf("%d",&page[i]);
or(i=1; i<=nf; i++)
fr[i]=-1;
or(i=1; i<=psz; i++)
{
if(full(fr,nf)==1)
break;
else
{
flag=0;
for(j=1; j<=nf; j++)
{
if(page[i]==fr[j])
{
flag=1;
printf(" \t%d:\t",page[i]);
break;
}

}
if(flag==0)
{
fr[p]=page[i];
printf("                  \t%d:\t",page[i]);
p++;
}
for(j=1; j<=nf; j++)
printf(" %d  ",fr[j]);
printf("\n");
}
}
p=0;
or(; i<=psz; i++)
{
flag=0;
for(j=1; j<=nf; j++)
{
if(page[i]==fr[j])
{
flag=1;
break;
}
}
if(flag==0)
{
p++;
for(j=1; j<=nf; j++)
{
for(k=i+1; k<=psz; k++)
{
if(fr[j]==page[k])
{
u[j]=k;

break;
}
else
u[j]=21;
}
}
for(j=1; j<=nf; j++)
t[j]=u[j];
for(j=1; j<=nf; j++)
{
for(k=j+1; k<=nf; k++)
{
if(t[j]<t[k])
{
t1=t[j];
t[j]=t[k];
t[k]=t1;
}
}
}
for(j=1; j<=nf; j++)
{
if(t[1]==u[j])
{
fr[j]=page[i];
u[j]=i;
}
}
printf("page fault\t");
}
else
printf("                   \t");
printf("%d:\t",page[i]);
for(j=1; j<=nf; j++)
printf(" %d  ",fr[j]);

printf("\n");
}
printf("\ntotal page faults:   %d",p+3);
etch();
full(int a[],int n)
nt k;
or(k=1; k<=n; k++)
{
if(a[k]==-1)
return 0;
}