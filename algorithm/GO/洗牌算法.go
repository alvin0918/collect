package main

import (
	"math/rand"
	"time"
	"fmt"
)

func main() {
	intArr := []int{1,2,3,4,5,6,7,8,9}

	shuffle(intArr)

	fmt.Println(intArr)
}

// 洗牌算法
func shuffle(arr []int){
	rand.Seed(time.Now().UnixNano())
	var i, j int
	var temp int
	for i = len(arr) - 1; i > 0; i-- {
		j = rand.Intn(i + 1)
		temp = arr[i]
		arr[i] = arr[j]
		arr[j] = temp
	}
}