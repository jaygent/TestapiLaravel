
## Задание
В магазине продается три разных вида (категории) товаров имеющих общие обязательные параметры - цена(float), название(string), артикул(uuid) и разный набор свойств характерный для товаров каждой из категорий:

1. Материалы(записи из таблицы materials, отношение 1 ко многим), цвет(string код в Hex формате), размер(string).
2. Состав(array, массив строк), вес(int).
3. Производитель(запись из таблицы brands, отношение 1 к 1), описание(text).

Должна быть возможность фильтрации и поиска в пределах каждой категории по любой допустимой комбинации параметров.
Например - выбрать все товары из 3 категории по определенному производителю и отсортировать по цене. Выбрать из первой категории товары по определенному цвету и материалу.

Кол-во товаров ~ 10000, данные по товарам обновляются постоянно.

Необходимо разработать структуру БД для хранения информации и реализовать метод API принимающий параметры для фильтрации и сортировки и возвращающий товары нужной группы в формате JSON.
За основу взять Laravel, код необходимо опубликовать в GitHub.

# Результат выполнения

Имеются два варианта с использование готовой библиотеки spatie query-builder

# Spatie query-builder

Фильтрация по полям
>/api/v1/products
> > По сущности Products - name,price,weight,structure(json)
> 
> > По сущности Materials -color,size,id
> 
> > По сущности Categories -name,id
>
> > По сущности Brands -name,id
>
Примеры использование выборки
> 
> /api/v1/products?filter[brand.id]=10038&sort=price
> /api/v1/products?filter[brand.id]=10038&filter[categories.name]=text
> /api/v1/products?filter[structure][key_Array]=value
