# -*- coding: utf-8 
#Simple Linear Regression
import numpy as np
import matplotlib.pyplot as plt
import pandas as pd

#importing Dataset
dataset = pd.read_csv('Salary_Data.csv')
x = dataset.iloc[: , :-1].values #matrix of features
y = dataset.iloc[:,1].values  #vector of the dependent variable

#Splitting Dataset into the Training set and test set
from sklearn.cross_validation import train_test_split
x_train, x_test, y_train, y_test = train_test_split(x, y, test_size =0.33, random_state = 0)

#fature scaling
"""from sklearn.preprocessing import StandardScaler
sc_x = StandardScaler()
x_train = sc_x.fit_transform(x_train)
x_test = sc_x.transform(x_test)""" 

#Fitting Simple Linear Regression to the Training set
from sklearn.linear_model import LinearRegression
regressor = LinearRegression()
regressor.fit(x_train, y_train)

# Predicting the Test set result
y_pred = regressor.predict(x_test)

#Visualizing The Training Set Result
plt.scatter(x_train, y_train, color ='red')
plt.plot(x_train, regressor.predict(x_train), color = 'blue')
plt.title('Salary vs Experience(Training set)')
plt.xlabel('Years of Experience')
plt.ylabel('salary')
plt.show()

#Visualizing The Test Set Result
plt.scatter(x_test, y_test, color ='red')
plt.plot(x_train, regressor.predict(x_train), color = 'blue')
plt.title('Salary vs Experience(Test set)')
plt.xlabel('Years of Experience')
plt.ylabel('salary')
plt.show()