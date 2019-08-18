package main

import "fmt"

func main() {


	var (
		list []int
	)

	list = []int{1,2,453,6,7,68,67,876,976,9789}

	InsertionSort(list)
}

func InsertionSort(s []int) {
	n := len(s)
	if n < 2 {
		return
	}

	//默认的0位置上的指排好序的
	for i := 1; i < n; i++ {
		//这其中i就是当前我操作的元素的下标
		//判断当前元素于它的前一个
		for j := i; j > 0 && s[j] < s[j - 1]; j-- {
			swap(s, j, j - 1)
		}
	}

	fmt.Println(s)
}

func swap(slice []int, i int, j int) {
	slice[i], slice[j] = slice[j], slice[i]
}