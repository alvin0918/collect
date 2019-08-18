package main

import "fmt"

func main() {

	var (
		list []int
	)

	list = []int{1,2,453,6,7,68,67,876,976,9789}

	BubbleAsort(list)
}

func BubbleAsort(values []int) {
	for i := 0; i < len(values)-1; i++ {
		for j := i+1; j < len(values); j++ {
			if  values[i]>values[j]{
				values[i],values[j] = values[j],values[i]
			}
		}
	}
	fmt.Println(values)
}
