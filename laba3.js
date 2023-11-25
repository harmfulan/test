// let number_matrix = Number(prompt("Введите размер матрицы: ")) 
let number_matrix = 6 
let Z = Number(prompt("Введите число Z: ")); //Вводим число Z по условию 
// let matrix = []; //создаем пустой паустой массив 
let temp_mat = []  // временный массив для операций над значениями


function getNumbermatrix(messages)
{
let Num = Number(prompt(messages)) // строка матрицы с номером N или M 
	if (Num > number_matrix)
		{
			return getNumbermatrix(messages)
		}
	return Num
}

let N = getNumbermatrix(messages="Введите строку матрицы с номером N:") // строка матрицы с номером N
let M = getNumbermatrix(messages="Введите строку матрицы с номером M:") // строка матрицы с номером M


function getRandomNumber(min, max) {
      return Math.floor(Math.random() * (max - min) + min)
  }  
// Инициализируем матрицу 
// for (let i = 0; i < number_matrix; i++) {
// 	let temp_array = []
// 	for (let j = 0; j < number_matrix; j++) 
//  		{
//  			temp_array.push(getRandomNumber(1, 99))
//  		}
//  	matrix.push(temp_array)
// }

matrix = [[1,2,3,4,5,6],[1,2,3,4,5,6],[1,2,3,4,5,6],[1,2,3,4,5,6],[1,2,3,4,5,6],[1,2,3,4,5,6]]


// Создаем временный массив согласно условию задачи  
for (let n = 0; n < matrix.length; n++)
{	
	for (let g = 0; g < matrix[n].length; g++)
	{
		if (n == N)
		{
	
			matrix[M][g] = ((matrix[n][g] * Z) + matrix[M][g])
		}
	}
}


matrix
//--------------------------Ра-----------------------------------\\