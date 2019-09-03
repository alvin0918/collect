package main

import (
	"os"
	"fmt"
	"github.com/axgle/mahonia"
	"time"
	"strings"
	"io"
	"golang.org/x/net/html/charset"
	"bytes"
	"io/ioutil"
	"net"
)

// 判断文件是否存在
func FileExists(name string) bool {
	if _, err := os.Stat(name); err != nil {
		if os.IsNotExist(err) {
			return false
		}
	}
	return true
}

// 错误处理
func RecoverName() {

	var (
		r interface{}
	)

	if r = recover(); r!= nil {
		fmt.Println("recovered from ", r)
	}
}

// 字符串编码转换
func UseNewEncoder(src string,oldEncoder string,newEncoder string) string{
	srcDecoder := mahonia.NewDecoder(oldEncoder)
	desDecoder := mahonia.NewDecoder(newEncoder)
	resStr:= srcDecoder.ConvertString(src)
	_, resBytes, _ := desDecoder .Translate([]byte(resStr), true)
	return string(resBytes)
}

func ValidUTF8(buf []byte) bool{
	nBytes := 0
	for i:= 0;i<len(buf);i++{
		if nBytes == 0{
			if (buf[i] & 0x80) != 0 {  //与操作之后不为0，说明首位为1
				for (buf[i] & 0x80) != 0 {
					buf[i] <<= 1 //左移一位
					nBytes++ //记录字符共占几个字节
				}

				if nBytes < 2 || nBytes > 6 { //因为UTF8编码单字符最多不超过6个字节
					return false
				}

				nBytes-- //减掉首字节的一个计数
			}
		}else{ //处理多字节字符
			if buf[i] & 0xc0 != 0x80{ //判断多字节后面的字节是否是10开头
				return false
			}
			nBytes--
		}
	}
	return nBytes == 0
}

// 监测并转换

func Valid(buf string) string {
	if !ValidUTF8([]byte(buf)) {
		return UseNewEncoder(buf, "gbk", "utf-8")
	}
	return buf
}

// 获取当前时间
func GetTime() string {
	return time.Now().Format("2006-01-02 15:04:05")
}

// 用逗号分隔字符串
func StrToArray(array_or_slice []string) string {
	return strings.Replace(strings.Trim(fmt.Sprint(array_or_slice), "[]"), " ", ",", -1)
}

// 转换编码
func EncodeBytes(b string) (res string, err error) {

	var (
		ret []byte
		r io.Reader
	)

	r, err = charset.NewReader(bytes.NewReader([]byte(b)), "UTF-8")
	if err != nil {
		return "", err
	}

	ret, err = ioutil.ReadAll(r)

	res = string(ret)

	return
}

// 获取本机IP
func GetIp() string {
	addrs, err := net.InterfaceAddrs()

	if err != nil {
		fmt.Println(err)
		os.Exit(1)
	}

	for _, address := range addrs {

		// 检查ip地址判断是否回环地址
		if ipnet, ok := address.(*net.IPNet); ok && !ipnet.IP.IsLoopback() {
			if ipnet.IP.To4() != nil {
				return ipnet.IP.String()
			}

		}
	}

	return "127.0.0.1"

}
