import React, { Component } from 'react';
import { View, TextInput, Text, TouchableOpacity, StyleSheet, Alert } from 'react-native';
import register from '../../api/register';

export default class SignUp extends Component {
    constructor(props) {
        super(props);
        this.state = {
            name: '',
            phone: '',
            address: '',
            email: '',
            password: '',
            rePassword: ''
        };
    }

    onSuccess() {
        Alert.alert(
            'Notice',
            'Đăng ký tài khoản thành công',
            [
                { text: 'OK', onPress: this.props.gotoSignIn() }
            ],
            { cancelable: false }
        );
    }

    onFail() {
        Alert.alert(
            'Notice',
            'Email has been used by other',
            [
                { text: 'OK', onPress: () => this.removeEmail.bind(this) }
            ],
            { cancelable: false }
        );
    }

    removeEmail() {
        this.setState({ email: '' });
    }

    registerUser() {
        const { name, phone, address, email, password } = this.state;
        register(email, name, phone, address, password)
        .then(res => {
            if (res === 'THANH_CONG') return this.onSuccess();
            this.onFail();
        });
    }

    render() {
        const { inputStyle, bigButton, buttonText } = styles;
        return (
            <View>
                
                <TextInput 
                    style={inputStyle} 
                    placeholder="Nhập họ và tên" 
                    value={this.state.name}
                    onChangeText={text => this.setState({ name: text })}
                />
                <TextInput 
                    style={inputStyle} 
                    placeholder="Nhập số điện thoại" 
                    value={this.state.phone}
                    onChangeText={text => this.setState({ phone: text })}
                />
           <TextInput 
                    style={inputStyle} 
                    placeholder="Nhập địa chỉ nhà" 
                    value={this.state.address}
                    onChangeText={text => this.setState({ address: text })}
                />
                <TextInput 
                    style={inputStyle} 
                    placeholder="Nhập địa chỉ E-Mail" 
                    value={this.state.email}
                    onChangeText={text => this.setState({ email: text })}
                />
                <TextInput 
                    style={inputStyle} 
                    placeholder="Nhập mật khẩu" 
                    value={this.state.password}
                    secureTextEntry
                    onChangeText={text => this.setState({ password: text })}
                />
                <TextInput 
                    style={inputStyle} 
                    placeholder="NHập lại mật khẩu" 
                    value={this.state.rePassword}
                    secureTextEntry
                    onChangeText={text => this.setState({ rePassword: text })}
                />
                <TouchableOpacity style={bigButton} onPress={this.registerUser.bind(this)}>
                    <Text style={buttonText}>Đăng ký</Text>
                </TouchableOpacity>
            </View>
        );
    }
}
const styles = StyleSheet.create({
    inputStyle: {
        height: 50,
        backgroundColor: '#fff',
        marginBottom: 10,
        borderRadius: 20,
        paddingLeft: 30
    },
    bigButton: {
        height: 50,
        borderRadius: 20,
        borderWidth: 1,
        borderColor: '#fff',
        alignItems: 'center',
        justifyContent: 'center'
    },
    buttonText: {
        fontFamily: 'Avenir',
        color: '#fff',
        fontWeight: '400'
    }
});
