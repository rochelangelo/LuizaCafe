import React, {Component} from 'react';
import {Platform, StyleSheet, Text, View, Button, AsyncStorage, Alert,} from 'react-native';

import api from './services/api'

export default class App extends Component{

  state = {
    loggedInUser: null,
    errorMenssage: null,
  };

  signIn = async () => {
    try {
      const response = await api.post('/wp-json/jwt-auth/v1/token', {      
        username: 'jose@gmail.com',
        password: '123',
      });
      
      const { user, token } = response.data;

      await AsyncStorage.multiSet([
        ['@cafeluiza:token', token],
        ['@cafeluiza:user', JSON.stringify(user),]
      ]);

      this.setState({loggedInUser: user});

      Alert.alert('Logado');

    }catch(response){
      this.setState({errorMenssage: response.data.console.error});
    }


  
  };

  render() {
    return (
      <View style={styles.container}>

        { this.state.loggedInUser && <Text>{this.state.loggedInUser}</Text> }

        { this.state.errorMenssage && <Text>{this.state.errorMenssage}</Text> }

        <Button onPress={this.signIn} title="ENTRAR"></Button>
      </View>
    );
  }
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: '#F5FCFF',
  },
});
