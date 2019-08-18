package main

import (
	"strings"
	"fmt"
	"github.com/pkg/errors"
)

func main() {
	fmt.Println(getRelativePath(
		"/Users/alvin/project/go/src/colly/main.go",
		"/Users/alvin/project/collect/algorithm/GO/插入排序.go"))
}

func getRelativePath(path1, path2 string) (string, error) {
	if path1 == "" || path2 == "" {
		return "", errors.New("绝对路径不可以为空")
	}

	arr1 := strings.Split(path1[1:], "/")
	arr2 := strings.Split(path2[1:], "/")
	depth := 0
	for i := 0; i < len(arr1) && i < len(arr2); i++ {
		if arr1[i] == arr2[i] {
			depth ++
		} else {
			break
		}
	}
	prefix := ""
	if len(arr1)-depth-1 <= 0 {
		prefix = "./"
	} else {
		for i := len(arr1) - depth - 1; i > 0; i -- {
			prefix += "../"
		}
	}
	fmt.Println(depth)
	if len(arr2)-depth > 0 {
		prefix += strings.Join(arr2[depth:], "/")
	}
	return prefix, nil
}
